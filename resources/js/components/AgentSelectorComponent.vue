<template>
    <div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="scenario_name">Name</label>
                    <input class="form-control" placeholder="Name your Agent" type="text" name="agent[name]" id="scenario_name">
                </div>


                <div class="form-group">
                    <label for="agent_name">Select agent type</label>
                    <select id="agent_name" class="form-control" v-model="selected_agent">
                        <option v-for="agent in agents" v-bind:value="agent" v-html="agent.name">
                        </option>
                        <!--                <option value="">Select ...</option>-->
                        <!--                <option value="1">PHP Agent</option>-->
                    </select>

                    <div v-if="selected_agent">
                        form
                    </div>
                </div>
            </div>

            <div class="col">
                <div v-if="selected_agent">
                    <vue-markdown v-bind:source="selected_agent.description"></vue-markdown>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
    import VueMarkdown from 'vue-markdown'

    export default {
        components: {
            VueMarkdown
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
