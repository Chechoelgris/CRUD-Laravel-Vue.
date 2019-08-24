<template>
    <div class="">

        <button type="button" class="btn btn-brown-dark text-light mt-2 mb-2 " data-toggle="modal" data-target="#addPokemon">
	  			Agregar
	    </button>
            <spinner-load v-show="loading"></spinner-load>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-2" v-for="character in characters">
                <div class="card bg-brown-dark text-light text-center
                    text-center" >
                    <img src="" class="card-img-top" alt="">
                    <div class="card-body">
                        <h2 class="card-title text-light">{{character.nombre}}</h2>
                        <p class="card-text text-light">{{character.raza}} / {{character.clase}}</p>
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
