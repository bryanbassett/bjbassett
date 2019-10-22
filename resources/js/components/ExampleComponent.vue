<template>


<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item: {{item.name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div v-for="(d) in item.fullContent">
            <label >{{d.name }}</label>
            <input class="xdx form-control text" v-bind:name="'text///'+d.name" v-bind:value="d.value" type="text" v-if="d.type == 'text'">
            <input class="xdx form-control text" v-bind:name="'link///'+d.name" v-bind:value="d.value" type="text" v-if="d.type == 'link'">
            <input class="xdx form-control date" v-bind:name="'date///'+d.name" v-bind:value="d.value" type="date" v-if="d.type == 'date'">
            <textarea class="xdx form-control text" v-bind:name="'textarea///'+d.name" v-bind:value="d.value" type="date" v-if="d.type == 'textarea'" rows="3"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" @click="postTime(item.id)" class="btn btn-primary">Save changes</button>
    </div>
</div>



</template>

<script>

    export default {
        data: function () {
            return {
                item: {
                    name:'loading'
                },
            }
        },
        mounted() {
        },
        methods: {
            postTime (id){
                var jj = this;
                var obj = {};
                var xdx = $('.xdx');
                var xdxL = xdx.length;
                var g = '';
                xdx.each(function(i,e){
                    obj[$(e).attr('name')]  = $(e).val()  ;
                    if((xdxL-1)===i){
                        var c = JSON.stringify(obj);
                        var link = '/edititem/'+id;
                        axios.post(link, {
                            'fullContent': c,
                        })
                            .then(function (response) {
                              //  location.reload();
                                $('#exampleModal').modal('hide');
                                axios
                                    .get('/popEditItem/'+id)
                                    .then(response => {
                                        var z=0;
                                        g = jj.parse(response.data.item.fullContent);
                                        g = _.mapKeys(g, function(value, key) {
                                            key = z;
                                            z++;
                                            return key;
                                        });
                                    }).then(function(){
                                            $.each(g,function(b,c){
                                                if(c.type=='text' || c.type=='textarea'){
                                                    var itclass = c.name.replace(/[^a-zA-Z0-9]/g, '').toLowerCase();
                                                    $('.it-id-'+id+' p.'+itclass).html('<p class=" '+ itclass +'">'+ c.value +'</p>');
                                                }
                                            })
                                });
                            })
                            .catch(function (error) {
                                console.log(error);
                            });

                    }
                });

            },
            modalPop (link) {
                var jj=this;
                axios
                    .get(link)
                    .then(response => (this.item = response.data.item))
                    .then(function(){
                        jj.item.fullContent = jj.parse(jj.item.fullContent);
                        $('#exampleModal').modal('show')
                    });
            },
            parse (value) {
                let d = '';
                let e = '';
                let f = '';
                let jarsed = ''
                let parsed = JSON.parse(value);
                let keys = Object.keys(parsed);

                jarsed = Object.keys(parsed).map(i => parsed[i]);
                let newparsed = {};
                jarsed.forEach((x,i) => {
                    d = Object.entries(parsed)[i][0].split("///");
                    e = d[0];
                    f = d[1];
                    newparsed[f] = {
                            'type':e,
                            'value':x,
                            'name':f,
                    }
                });
                return newparsed;
            }
        },
    }

</script>
