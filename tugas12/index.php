<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Component Veu.js</title>
    <script src="https://unpkg.com/vue@3"></script>
</head>
<body>
    
    <div id="app" v-if = "status == 'tampilkan'">
        {{ message }}<br><br>
        <label v-for="user in user">Name : {{user.name}}, Umur: {{user.age}}<br></label>
    </div>

    <script type="text/javascript">
        Vue.createApp({
            data() {
            return {
                message: 'Hello Vue!',
                status: 'tampilkan',
                user:[
                    {
                        name:'Jabal',
                        age:'20'
                    },
                    {
                        name:'thoriq',
                        age:'20'
                    },
                    {
                        name:'Jabar',
                        age:'23'
                    },
                ]
            }
            }
        }).mount('#app')
    </script>
</body>
</html>