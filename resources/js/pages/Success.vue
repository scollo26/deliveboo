<template>
  <div class="container">

    <div class="success_card">
        <div v-if="success" class="alert alert-success" role="alert">
            Mail inviata con successo!
        </div>
        <div class="d-flex justify-content-center">
            <i class="checkmark">✓</i>
        </div>
        <div class="success_text text-center">
            <h1>Success</h1> 
            <p>We received your purchase request<br/> we'll be in touch shortly!</p>
        </div>
    </div>
    
  </div>
</template>

<script>
export default {
    name:"Success",
    props: ['data'],
      data(){
      return {
          message: "l'ordine è in stato di elaborazione",
          success: false,
          sending: false,
          errors: {}
      }
    },

    created() {
        console.log(this.data);
        this.sendForm();
    },

    methods:{
    sendForm(){
        this.sending = true;
        this.success = false;
        axios.post('/api/success', {
        'name': this.data.name,
        'email': this.data.email,
        'message': this.message
        })
        .then(response=>{
            console.log(response.data);
            if(!response.data.success){
                this.success = false;
                this.errors = response.data.errors;
            }
            else{
                this.success = true;
                this.errors = {};
                this.message="";
            }
            this.sending = false;
        })
        .catch(error=>{
            console.log(error.response.data);
            this.sending = false;
        })
    }
     }
}
</script>

 <style lang="scss" scoped>


    .container {
        display: flex;
        justify-content: center;
        .success_card {
            width: 60%;
            margin: 0 auto;
            padding: 60px;
            display: inline-block;

            h1 {
                color: #ffc526c0;
                font-weight: 900;
                font-size: 40px;
                margin-bottom: 10px;
            }

            p {
                font-size:20px;
                margin: 0;
            }

            i {
                text-align: center;
                color: #ffc526c0;
                font-size: 100px;
                line-height: 200px;
                margin-left:-15px;
            }

        }
    }

  

       
    </style>