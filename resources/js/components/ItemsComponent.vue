<template>
    <span :key="ckey" v-html="item" >
    </span>
</template>

<script>

    export default {
        props: ['itemsData'],
        data: function () {
            return {
                ckey: 0,
                item: this.itemsData
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
