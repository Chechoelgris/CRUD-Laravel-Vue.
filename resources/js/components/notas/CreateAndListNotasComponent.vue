<template>
    <div class="row justify-content-center">
        <div class="col-md-6 mb-5 bg-brown-dark text-light p-4">
            <form @submit.prevent="editarNota(nota)" v-if="editarActivo">
                <h3>Editar Notas</h3>
                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="nota.nombre">
                <input type="text" placeholder="Descripción" class="form-control mb-2" v-model="nota.descripcion">


                <button class="btn btn-success" type="submit">Guardar</button>
                <button class="btn btn-danger" type="submit"
                @click="cancelarEdicion()">Cancelar</button>
            </form>

            <form @submit.prevent="agregar" v-else>
                <h3>Agregar Nota</h3>
                <input type="text" placeholder="Titulo" class="form-control mb-2" v-model="nota.nombre">
                <textarea class="form-control mb-2"  rows="3" v-model="nota.descripcion" placeholder="Detalles"></textarea>


                <button class="btn btn-outline-light" type="submit">Agregar</button>
            </form>


            <hr class="mt-3">
                <div class="row container justify-content-between">
                    <h3>Diario</h3>
                    <button class="btn btn-outline-light"
                    type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"
                    >Mostrar</button>
                </div>
            <ul class="list-group my-2 collapse" id="collapseExample">
                <li class="list-group-item text-white bg-secondary"
                    v-for="(item, index) in notas" :key="index">
                    <span class="badge badge-dark text-light float-right">
                    {{item.updated_at}}
                </span>
                    <p>{{item.nombre}}</p>
                    <p>{{item.descripcion}}</p>

                   <div class="row justify-content-between">
                        <button class="btn btn-danger text-light btn-sm"
                    @click="eliminarNota(item, index)"><i class="fa fa-trash"></i>Eliminar</button>
                    <button class="btn btn-info text-light btn-sm"
                    @click="editarFormulario(item)"><i class="fa fa-pencil"></i> Editar</button>

                   </div>
                </li>
            </ul>



        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            notas: [],
            nota: {nombre: '', descripcion: ''},
            editarActivo: false
        }
    },
    created(){
        axios.get('/notas')
        .then(res => {
            this.notas = res.data;
        })
    },
    methods:{
        editarFormulario(item){
            this.editarActivo = true;
            this.nota.nombre = item.nombre;
            this.nota.descripcion = item.descripcion;
            this.nota.id = item.id;


        },
        editarNota(item){
            const params = {nombre: item.nombre, descripcion: item.descripcion};
            axios.put(`/notas/${item.id}`, params)
                .then(res=>{
                    this.editarActivo = false;

                    const index = this.notas.findIndex(
                        notaBuscar => item.id === res.data.id)
                    this.notas[index] = res.data;

                    this.nota.nombre = '';
                    this.nota.descripcion = '';

                     axios.get('/notas')
                      .then(res => {
                     this.notas = res.data;
                     })
                })
        },

        agregar(){
             if(this.nota.nombre.trim() === '' || this.nota.descripcion.trim() === ''){
                    alert('Debes completar todos los campos antes de guardar');
                    return;
                }
            const params = {
                nombre:this.nota.nombre,
                descripcion:this.nota.descripcion
            }


            this.nota.nombre = '';
            this.nota.descripcion = '';

            axios.post('notas', params)
                .then(res => {
                    this.notas.push(res.data)

                })

        },
        eliminarNota(item, index){
            axios.delete(`/notas/${item.id}`)
                .then(()=>{
                    this.notas.splice(index, 1);
                })
        },
        cancelarEdicion(){
            this.editarActivo = false;
            this.nota = {nombre: '', descripcion: ''};

        }
    }
}
</script>
