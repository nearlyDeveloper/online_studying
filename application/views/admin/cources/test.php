<div id="app">
    <div class="box" v-if="loader">
        <div class="box-body">
            <center>
                <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
            </center>
        </div>
    </div>
    <div v-else>
        <div class="box box-primary" v-for="(question, index) in questions">
            <div class="box-header with-border">
                <h3 class="box-title">Вопрос #{{ index+1 }}</h3>
            </div>
            <form role="form">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Вопрос</label>
                        <input type="text" class="form-control" v-model="question.text" placeholder="Какие птицы не летают?">
                    </div>
                    <div class="form-group">
                        <label>Ответ</label>
                        <select class="form-control" v-model="question.answer">
                            <option v-for="(answer, aIndex) in question.answers" :value="aIndex">{{ answer }}</option>
                        </select>
                    </div>
                    <hr>
                    <h4>Ответы</h4>
                    <div class="input-group" v-for="(answer, aIndex) in question.answers">
                        <span @click="question.answers.splice(aIndex,1);" class="input-group-addon"><i class="fa fa-times" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" v-model="question.answers[aIndex]" placeholder="Курица">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="button" @click="question.answers.push('')" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Добавить ответ</button>
                    <button type="button" @click="questions.splice(index,1);" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Удалить вопрос</button>
                </div>
            </form>
        </div>
        <div class="box">
            <div class="box-body">
                <button type="button" @click="save();" class="btn btn-info"><i class="fa fa-floppy-o" aria-hidden="true"></i> Сохранить тест</button>
                <button type="button" @click="questions.push({text: '',answer: 0,answers: []});" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Добавить вопрос</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            questions: [],
            id: <?=$cource->id;?>,
            loader: 0
        },
        methods: {
            load() {
                this.loader = 1;
                axios.get('/admin/cources/loadTest/'+ this.id).then((response) => {
                    this.loader = 0;
                    this.questions = response.data.data;
                    if (!this.questions) this.questions = [];
                });
            },
            save() {
                this.loader = 1;
                axios.post('/admin/cources/saveTest/'+ this.id, {data: JSON.stringify(this.questions)}).then( (response) => {
                    this.loader = 0;
                });
            }
        },
        created() {
            this.load();
        }
    })
</script>
<style>
    .input-group-addon {
        cursor: pointer;
    }
    .lds-ellipsis {
        display: inline-block;
        position: relative;
        width: 64px;
        height: 64px;
    }
    .lds-ellipsis div {
        position: absolute;
        top: 27px;
        width: 11px;
        height: 11px;
        border-radius: 50%;
        background: #3c8dbc;
        animation-timing-function: cubic-bezier(0, 1, 1, 0);
    }
    .lds-ellipsis div:nth-child(1) {
        left: 6px;
        animation: lds-ellipsis1 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(2) {
        left: 6px;
        animation: lds-ellipsis2 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(3) {
        left: 26px;
        animation: lds-ellipsis2 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(4) {
        left: 45px;
        animation: lds-ellipsis3 0.6s infinite;
    }
    @keyframes lds-ellipsis1 {
        0% {
            transform: scale(0);
        }
        100% {
            transform: scale(1);
        }
    }
    @keyframes lds-ellipsis3 {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(0);
        }
    }
    @keyframes lds-ellipsis2 {
        0% {
            transform: translate(0, 0);
        }
        100% {
            transform: translate(19px, 0);
        }
    }

</style>