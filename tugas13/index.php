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
        <label v-for="user in user">Name : {{user.name}}, Umur: {{user.age}}<br></label><br>
        <button @click="count++">Add 1</button>
        <button @click="count--">Add -1</button>
        <p>Count is: {{ count }}</p>

        <!-- `greet` is the name of the method defined above -->
        <button @click="greet">Greet</button><br><br>

        <!-- Calling Methods in Inline Handlers -->
        <button @click="say('hello')">Say hello</button>
        <button @click="say('bye')">Say bye</button><br><br>
        
        <!-- using $event special variable -->
        <button @click="warn('Form cannot be submitted yet.', $event)">
        Submit
        </button>

        <!-- using inline arrow function -->
        <button @click="(event) => warn('Form cannot be submitted yet.', event)">
        Submit
        </button><br><br>

        <!-- the click event's propagation will be stopped -->
        <a @click.stop="doThis"></a>

        <!-- the submit event will no longer reload the page -->
        <form @submit.prevent="onSubmit"></form>

        <!-- modifiers can be chained -->
        <a @click.stop.prevent="doThat"></a>

        <!-- just the modifier -->
        <form @submit.prevent></form>

        <!-- only trigger handler if event.target is the element itself -->
        <!-- i.e. not from a child element -->
        <div @click.self="doThat">...</div>
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
                    ],
                    count: 0,
                    name: 'Vue.js',
                }
            },

            methods:{
                greet: function greet(event) {
                    alert(`Hello `+this.name+`!`)
                    // `event` is the native DOM event
                    if (event) {
                        alert(event.target.tagName)
                    }
                },
                say: function say(message) {
                    alert(message)
                },
                warn:function warn(message, event) {
                    // now we have access to the native event
                    if (event) {
                        event.preventDefault()
                    }
                    alert(message)
                }
            }
        }).mount('#app')
    </script>
</body>
</html>