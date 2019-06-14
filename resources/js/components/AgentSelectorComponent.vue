<template>
    <div>
        <div class="form-group">
            <label for="agent_name">Select agent type</label>
            <select id="agent_name" class="form-control" v-model="selected_agent">
                <option v-for="agent in agents" v-bind:value="agent">
                    {{ agent.name }}
                </option>
<!--                <option value="">Select ...</option>-->
<!--                <option value="1">PHP Agent</option>-->
            </select>
        </div>

        <div v-if="selected_agent">
            <vue-markdown>{{ selected_agent.description }}</vue-markdown>
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
            getAgent(id) {

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
