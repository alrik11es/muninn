<template>
    <div>
        <vue-tags-input
            v-model="tag"
            :tags="tags"
            :autocomplete-items="filteredItems"
            @tags-changed="newTags => tags = newTags">
        </vue-tags-input>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tag: '',
                tags: [],
                autocompleteItems: [{
                    text: 'Spain',
                }, {
                    text: 'France',
                }, {
                    text: 'USA',
                }, {
                    text: 'Germany',
                }, {
                    text: 'China',
                }],
            };
        },
        computed: {
            // return this.autocompleteItems.filter(i => {
            //     return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
            // })
        }
    }
</script>
