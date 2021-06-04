@include('partials.head')

<div class="d-flex bg-light min-vh-100">
    @include('partials.nav')

    <div class="d-flex flex-column justify-content-center w-75 m-auto">
        @yield('main')
    </div>
</div>

@include('partials.footer')

<script>

    $(document).ready(function(){

        const apiUrl = 'https://geo.api.gouv.fr/communes?codePostal=';
        const format = '&format=json';

        let zipcode = $('#zipcode');
        let city = $('#city');

        $(zipcode).on('blur', function(){
            let code = $(this).val();
            let url = apiUrl + code + format;

            fetch(url, {method: 'get'}).then(response => response.json()).then(results => {
                $(city).find('option').remove();

                if(results.length){

                    $.each(results, function(key, value){
                        $(city).append('<option value="' + value.nom + '">' + value.nom + '</option>');
                    });

                    $(city).on('change', function (){
                        let cityName = $('#city').val()
                        getRegion(cityName)
                    })

                    getRegion(results[0].nom)
                }
                else{
                    if($(zipcode).val()){
                        console.log('Erreur de code postal.');
                    }
                }
            })
        });
    });

//promesse
    async function getRegion(region) {
        let res = await fetch(`https://api-adresse.data.gouv.fr/search/?q=${region}`, {method: 'get'})
        let data = await res.json()
        $('#region').val(data.features[0].properties.context.split(',')[2].trim())
    }




    function confirmSupr(route) {
        let confirm = window.confirm("Do you want to disable the account ?");
        if (confirm == true) {
            window.location = route;
        }
    }

</script>

<style>

    .table {
        min-height: 90vh;
    }

    .table td, .table th {
        vertical-align: inherit;
        padding: 1em;
    }

    main-form {
        width: 100%;
        display: grid;
        place-items: center;
    }

    h1 {
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form div {
        width: 30%;
        display: flex;
        justify-content: space-between;
    }
    form div input {
        width: 50%;
    }
</style>
