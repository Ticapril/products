<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-5 mt-5" v-for="(formulario,index) in formularios">
                <div class="card-header">
                    Formulário
                </div>
                <div class="card-body">
                <span class="float-right" style="cursor:pointer">X</span>
                    <h4 class="card-title text-dark">Insira os dados Abaixo</h4>
                    <input type="text" name="nome[]" class="form-control mb-2" placeholder="Nome"  v-model="formulario.nome">
                    <input type="email" name="email[]" class="form-control mb-2" placeholder="E-mail" v-model="formulario.email">
                    <textarea name="obs[]" id="" cols="30" rows="10" class="form-control" placeholder="Observações" v-model="formulario.obs"></textarea>
                </div>
            </div>
        <button class="btn btn-success mb-5 mt-5" @click="adicionarFormulario()">Adicionar Formulário</button>

        </div>
    </div>
</div>


<script>

const app = createApp({
  data() {
    return {
      formularios: [{nome: "", email: "", obs: ""}]
    } 
  },
  methods: {
     adicionarFormulario(){
        this.formularios.push({nome: '', email: '', obs: ''})
     }   
    }
})

app.mount('.container');
</script>