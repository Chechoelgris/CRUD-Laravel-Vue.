<template>

         <div class="row justify-content-center">
             <div class="col-md-6 mb-5 bg-dark text-light ">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Lvl</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Raza</th>
                            <th scope="col">Clase</th>

                        </tr>
                    </thead>
                     <tbody>
                        <tr v-for="(personaje, index) in personajes" :key="index">
                            <th scope="row">{{personaje.nivel}}</th>
                            <td>{{personaje.nombre}}</td>
                            <td>{{personaje.raza}}</td>
                            <td>{{personaje.clase}}</td>

                        </tr>
                    </tbody>
                </table>
            </div>
         </div>

</template>
<script>
export default {
    data(){
        return {
            personajes: [],
            personaje: {nombre: '', raza: '', clase: '', nivel: '', sexo: ''},
           // editarActivo: false
        }
    },
    created(){
        axios.get('/personajes')
        .then(res => {
            this.personajes = res.data;
        })
    },
    methods:{
        eliminarPersonaje(personaje, index){
            axios.delete(`/personajes/${personaje.id}`)
                .then(()=>{
                    this.personajes.splice(index, 1);
                })
        },
        verPersonaje(personaje){
            axios.get('/personajes/${personaje.id}')
        .then(res => {
            this.personajes = res.data;
        })
        },

    }
}
</script>
