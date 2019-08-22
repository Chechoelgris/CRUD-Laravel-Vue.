<template>

         <div>
             <h3>Listado de Personajes</h3>
                <ul class="list-group my-2">
                    <li class="list-group-item"
                        v-for="(personaje, index) in personajes" :key="index">
                        <span class="badge badge-primary float-right">
                         {{personaje.updated_at}}
                        </span>
                        <p>{{personaje.nombre}}</p>
                        <p>{{personaje.raza}}</p>
                        <p>{{personaje.clase}}</p>
                        <p>{{personaje.nivel}}</p>
                        <p>{{personaje.sexo}}</p>
                        <button class="btn btn-danger btn-sm"
                        @click="eliminarPersonaje(personaje, index)">X</button>

                        <button class="btn btn-warning btn-sm"
                        @click="editarFormulario(item)">Editar</button>
                    </li>
                </ul>

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

    }
}
</script>
