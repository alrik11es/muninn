<template>
    <div>
        <div class="row">
            <div class="col">

                <div class="form-group">
                    <label for="select_a_type">Select agent type</label>
                    <select id="select_a_type" class="form-control" v-model="selected_agent_type">
                        <option v-for="at in agent_types" v-bind:value="at" v-html="at.name">
                        </option>
                    </select>
                </div>

                <div v-if="selected_agent_type">
                    <input type="hidden" name="classname" v-bind:value="selected_agent_type.classname">


<!--                    <div class="form-group">-->
<!--                        <label>Sources</label>-->
<!--                        <vue-tags-input-->
<!--                            :tags="tags"-->
<!--                            :autocomplete-items="agents"-->
<!--                            @tags-changed="newTags => tags = newTags">-->
<!--                        </vue-tags-input>-->
<!--                    </div>-->

<!--                    <div class="form-group">-->
<!--                        <label>Receivers</label>-->
<!--                        <vue-tags-input-->
<!--                            :tags="tags"-->
<!--                            :autocomplete-items="agents"-->
<!--                            @tags-changed="newTags => tags = newTags">-->
<!--                        </vue-tags-input>-->
<!--                    </div>-->


                    <v-runtime-template :template="selected_agent_type.form"></v-runtime-template>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions" style="clear: both">
                                <input type="submit" name="commit" value="Save Agent" class="btn btn-primary" data-disable-with="Save Scenario">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div v-if="selected_agent_type">
                    <vue-markdown v-bind:source="selected_agent_type.description"></vue-markdown>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import VueMarkdown from 'vue-markdown'
    import VRuntimeTemplate from "v-runtime-template";

    export default {
        props: {
            agentId: null
        },
        components: {
            VueMarkdown,
            VRuntimeTemplate
        },
        data() {
            return {
                message: 'Hello',
                agent_types: [],
                selected_agent_type: null,
                tags: [],
                agents: [],
            }
        },
        methods: {
            update() {
                this.$forceUpdate()
            },
            getForm(id) {

            },
            getAgentTypesList(id) {
                axios.get('/api/agent/types').then(response => {
                    this.agent_types = response.data.list;
                }).then(() =>{
                    if (id) {
                        axios.get('/api/agent/'+id+'/type').then(response => {
                            this.selected_agent_type = response.data;
                        });
                    }
                });
            },
        },
        mounted() {
            if (this.agentId) {
                this.getAgentTypesList(this.agentId);
            } else {
                this.getAgentTypesList();
            }
            // axios.get('url', {});
            console.log('Component mounted.')
        }
    }
</script>
