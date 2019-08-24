<template>
    <div class="modal fade" id="addPokemon" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Personaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                     <form @submit.prevent="agregar">

                        <div class="form-group">
                            <label for="nombreInput">Nombre</label>
                            <input type="text" placeholder="Ingresa el nombre de tu personaje" class="form-control mb-2" v-model="personaje.nombre">
                        </div>

                        <div class="form-group">
                            <label for="razaSelect">Raza</label>
                            <select class="form-control"  id="razaSelect" v-model="personaje.raza" >

                                <option value="Enano">Enano</option>
                                <option value="Elfo">Elfo</option>
                                <option value="Mediano">Mediano</option>
                                <option value="Humano">Humano</option>
                                <option value="Draconido">Dracónido</option>
                                <option value="Gnomo">Gnomo</option>
                                <option value="Semielfo">Semielfo</option>
                                <option value="Semiorco">Semiorco</option>
                                <option value="Tiflin">Tiflin</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="claseSelect">Clase (Principal)</label>
                            <select class="form-control" id="claseSelect" v-model="personaje.clase">

                                <option value="Barbaro">Bárbaro</option>
                                <option value="Bardo">Bardo</option>
                                <option value="Brujo">Brujo</option>
                                <option value="Clérigo">Clérigo</option>
                                <option value="Druida">Druida</option>
                                <option value="Explorador">Explorador</option>
                                <option value="Guerrero">Guerrero</option>
                                <option value="Hechicero">Hechicero</option>
                                <option value="Mago">Mago</option>
                                <option value="Monje">Monje</option>
                                <option value="Paladin">Paladin</option>
                                <option value="Picaro">Pícaro</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="nivel">Nivel</label>
                            <input type="number" placeholder="Indica el nivel actual" class="form-control mb-2" v-model="personaje.nivel">
                        </div>



                        <button class="btn btn-outline-success" type="submit" data-toggle="modal" data-target="#exampleModal">Agregar</button>



                    </form>

                </div>
            </div>
        </div>
    </div>
</template>
<script>

import EventBus from '../../event-bus';

export default {
    data(){
        return {
            personajes: [],
            personaje: {nombre: '', raza: '', clase: '', nivel: '' },

        }
    },
     created(){
        axios.get('/personajes')
        .then(res => {
            this.personajes = res.data;

        })
    },
    methods:{
         agregar(){
         if(this.personaje.nombre.trim() === '' || this.personaje.raza.trim() === '' || this.personaje.clase.trim() === '' || this.personaje.nivel.trim() === '' ){
             alert('Debes completar todos los campos antes de guardar');
         return;
         }
        const params = {
            nombre:this.personaje.nombre,
            raza:this.personaje.raza,
            clase:this.personaje.clase,
            nivel:this.personaje.nivel,

        }

            this.personaje.nombre = '';
            this.personaje.raza = '';
            this.personaje.clase = '';
            this.personaje.nivel = '';


        axios.post('/personajes',
                    params)
            .then(res => {
                EventBus.$emit('character-added', res.data.character)

            // this.personajes.push(res.data)
            // alert('Personaje Creado Correctamente');
            })
        },
    }
}
</script>
