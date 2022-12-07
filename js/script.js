const { createApp } = Vue;

const app = createApp({
    data() {
        return {
          message: 'Hello Vue!',
          data: [],
          comic: {
            thumb:'',
            price:'',
            series:'',
            type: ''
          }
        }
      },
      methods:{
        getData(){
            axios.get('server.php').then((res)=>{
              console.log(res.data);
              //const data = JSON.parse();
              this.data = res.data;
            });
        },
        save(){
          console.log(this.comic);
          axios.post('server.php',this.comic,{
            headers: { 'Content-Type': 'multipart/form-data' } 
          }).then((response)=>{
            console.log(response.data);
          })
        }               
      }
    }).mount('#app');
