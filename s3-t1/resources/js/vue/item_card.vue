<template>
    <b-message
            :title="d_card.name"
            type="is-success"
            has-icon
            aria-close-label="Close message"
            @close="closeCard"
    >
        {{ d_card.name}}
    </b-message>
</template>

<script>
export default {
    name: "item_card",
    props:{
        item:String
    },
    data(){
        return{
            d_card: JSON.parse(this.item)
        }
    },
    methods:{
        closeCard:function(){
            window.history.back()
        }
    }
}
</script>

<style scoped>

</style>
