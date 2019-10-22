<template v-html="item">
    <span :class="x" :key="ckey" v-html="item" >
    </span>
</template>

<script>

    export default {
        props:['itemsData','itemIdentity'],

        data: function () {
            return {
                ckey: 0,
                item: this.itemsData,
                x: 'it-id-'+this.itemIdentity,
            }
        },
        mounted() {

        },
        methods: {
            forceRerender() {
                this.$forceUpdate();
            }
        }
    }
</script>
