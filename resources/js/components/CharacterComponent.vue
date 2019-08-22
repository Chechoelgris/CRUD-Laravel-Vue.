<template>
    <div>
         <form @submit.prevent="agregar">
             <h3>Crear Personaje</h3>
             <div class="form-group">
                <label for="nombreInput">Nombre</label>
                <input type="text" placeholder="Ingresa el nombre de tu personaje" class="form-control mb-2" v-model="personaje.nombre">
            </div>

             <div class="form-group">
                <label for="razaSelect">Raza</label>
                <select class="form-control" id="razaSelect" v-model="personaje.raza">
                    <option value="0">Selecciona una raza</option>
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
                    <option value="0">Selecciona una clase</option>
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

            <div class="form-group">
                <label for="sexoSelect">Sexo</label>
                <select class="form-control" id="claseSelect" v-model="personaje.sexo">
                    <option value="0">Indica su sexo</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Agregar</button>
        </form>
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
       agregar(){
         if(this.personaje.nombre.trim() === '' || this.personaje.raza.trim() === '' || this.personaje.clase.trim() === '' || this.personaje.nivel.trim() === '' || this.personaje.sexo.trim() === ''){
             alert('Debes completar todos los campos antes de guardar');
         return;
         }
        const params = {
            nombre:this.personaje.nombre,
            raza:this.personaje.raza,
            clase:this.personaje.clase,
            nivel:this.personaje.nivel,
            sexo:this.personaje.sexo,
        }

            this.personaje.nombre = '';
            this.personaje.raza = '';
            this.personaje.clase = '';
            this.personaje.nivel = '';
            this.personaje.sexo = '';

        axios.post('personajes', params)
            .then(res => {
                this.personajes.push(res.data)
            })
        }

    }
}
</script>
