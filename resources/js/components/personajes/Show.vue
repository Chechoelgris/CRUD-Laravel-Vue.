<template>
    <div class="">

        <button type="button" class="btn btn-brown-dark text-light mt-2 mb-2 " data-toggle="modal" data-target="#addPokemon">
	  			Agregar
	    </button>
            <spinner-load v-show="loading"></spinner-load>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-2" v-for="character in characters">
                <div class="card bg-brown-dark text-light text-center" >

                    <img src="https://i.pinimg.com/736x/dd/4f/0a/dd4f0a90c075e63e466ccb66172682b8.jpg"
                            class="card-img-top mx-auto d-block rounded-circle m-3"
                            style="height: 250px; width: 250px; "
                            v-if="character.raza === 'Mediano'">

                    <img src="https://www.rincondeldm.com/sites/default/files/wiki/254/enano.jpg"
                            class="card-img-top mx-auto d-block rounded-circle m-3"
                            style="height: 250px; width: 250px; "
                            v-else-if="character.raza === 'Enano'">

                    <img src="https://i.pinimg.com/564x/80/d6/72/80d67232817bda3178e2b2d1193023b1.jpg"
                            class="card-img-top mx-auto d-block rounded-circle m-3"
                            style="height: 250px; width: 250px; "
                            v-else-if="character.raza === 'Elfo'">


                    <img src="https://i.pinimg.com/originals/52/28/88/522888301572b616aff2bd62c47bcf7e.jpg"
                            class="card-img-top mx-auto d-block rounded-circle m-3"
                            style="height: 250px; width: 250px; "
                            v-else-if="character.raza === 'Humano'">

                    <img src="https://theactionpoint.files.wordpress.com/2011/11/192.jpg"
                            class="card-img-top mx-auto d-block rounded-circle m-3"
                            style="height: 250px; width: 250px; "
                            v-else-if="character.raza === 'Draconido'">

                    <img src="https://i.pinimg.com/originals/49/cb/03/49cb030180c882134a83d4c39fa009a4.jpg"
                            class="card-img-top mx-auto d-block rounded-circle m-3"
                            style="height: 250px; width: 250px; "
                            v-else-if="character.raza === 'Gnomo'">

                    <img src="http://1.bp.blogspot.com/_B18OpI-w2BM/S9xnxO2udrI/AAAAAAAAC74/pTbJwrj6qk4/w1200-h630-p-k-no-nu/semi.jpg"
                            class="card-img-top mx-auto d-block rounded-circle m-3"
                            style="height: 250px; width: 250px; "
                            v-else-if="character.raza === 'Semielfo'">

                    <img src="https://i.pinimg.com/564x/62/4a/f6/624af6e6ff82f75058c39f60f24eeb41.jpg"
                            class="card-img-top mx-auto d-block rounded-circle m-3"
                            style="height: 250px; width: 250px; "
                            v-else-if="character.raza === 'Semiorco'">

                    <img src="http://vignette3.wikia.nocookie.net/forgottenrealms/images/c/c6/4e_tiefling.jpg/revision/latest?cb=20080924052904"
                            class="card-img-top mx-auto d-block rounded-circle m-3"
                            style="height: 250px; width: 250px; "
                            v-else-if="character.raza === 'Tiflin'">

                    <div class="card-body">
                        <h2 class="card-title text-light">{{character.nombre}}</h2>
                        <p class="card-text text-naranjo">{{character.raza}} / {{character.clase}}</p>
                        <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-outline-dark text-light brown-dark-hover">Detalles</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import EventBus from '../../event-bus';
    export default {
        data(){
            return{
                characters:[],
                loading: true
            }
        },
        created(){
            EventBus.$on('character-added', data => {
                this.characters.push(data)
            })
        },
        mounted() {
            axios
            .get('/personajes')
            .then((res) => {
                this.characters = res.data;
                this.loading = false;
            })
        }
    }
</script>
