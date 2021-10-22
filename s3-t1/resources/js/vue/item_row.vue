<template>
    <a :href="getHref">
        <div class="card">
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                        <figure class="image is-48x48">
                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <p class="title is-4">{{item.name}}</p>
                        <p class="subtitle is-6">{{'id '+item.id}}</p>
                    </div>
                </div>

                <div class="content">
                    {{item.name}}
                    <br>
                    <time datetime="2016-1-1">{{ itemDate }}</time>
                </div>
            </div>
        </div>
    </a>
</template>

<script>
export default {
    name: "item_row",
    props:{
        item: Object
    },
    computed:{
        itemDate:{
            get:function(){
                let dt = new Date(this.item.date_reg)

                let options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    weekday: 'long',
                    timezone: 'UTC',
                    hour: 'numeric',
                    minute: 'numeric',
                    second: 'numeric'
                };

                return dt.toLocaleString("ru", options)
            }
        },
        getHref:{
            get:function(){
                return document.URL+'/'+this.item.id+'-'+encodeURI(this.item.name+'.html')
            }
        }
    }
}
</script>

<style scoped>

</style>
