<template>
    <div>
            <div class="form-group">
                <label for="agent_name">Select agent type</label>
                <select id="agent_name" class="form-control" v-model="selected_agent" v-on:update="update()">
                    <option v-for="agent in agents" v-bind:value="agent" v-html="agent.name">
                    </option>
                    <!--                <option value="">Select ...</option>-->
                    <!--                <option value="1">PHP Agent</option>-->
                </select>

                <div v-if="selected_agent">
                    <v-runtime-template :template="selected_agent.form"></v-runtime-template>
                </div>
            </div>

            <div v-if="selected_agent">
                <vue-markdown v-bind:source="selected_agent.description"></vue-markdown>
            </div>


    </div>
</template>

<script>
    import VueMarkdown from 'vue-markdown'
    import VRuntimeTemplate from "v-runtime-template";

    export default {
        components: {
            VueMarkdown,
            VRuntimeTemplate
        },
        data() {
            return {
                message: 'Hello',
                agents: [],
                selected_agent: null
            }
        },
        methods: {
            update() {
                this.$forceUpdate()
            },
            getForm(id) {

            },
            getAgentList() {
                axios.get('/api/agents').then(response => {
                    this.agents = response.data.list;
                });
            },
        },
        mounted() {


            this.getAgentList();
            // axios.get('url', {});
            console.log('Component mounted.')
        }
    }
</script>
