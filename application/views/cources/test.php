<div id="app">
    <div class="box" v-if="loader">
        <div class="box-body">
            <center>
                <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
            </center>
        </div>
    </div>
    <div v-else>
        <div class="box box-solid" v-if="!question.answers">
            <div class="box-body">
                <center>
                    <img style="margin-top: 15px;margin-bottom: 8px" width="90px" src="https://image.flaticon.com/icons/svg/136/136380.svg">  <!--Как я понимаю это изображение отвалилось, его поменять -->
                </center>
                <br>
                <p class="text-center"><b>Поздравляем!</b> Вы успешно прошли тест</p>
            </div>
            <!-- /.box-body -->
        </div>
        <div class="box" v-else>
            <form role="form">
                <div class="box-body">
                    <h3>{{ question.text }}</h3>
                    <hr>
                    <div class="alert alert-danger alert-dismissible" v-if="error">
                        Вы выбрали неверный ответ.
                    </div>
                    <button @click="checkAnswer(aIndex)" type="button" v-for="(answer, aIndex) in question.answers" style="text-align: left;" :class="'btn btn-block ' + ((error && aIndex == errorIndex) ? 'btn-danger' : 'btn-default')">{{ answer }}</button>
                </div>
            </form>
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
            nowIndex: 0,
            id: <?=$cource->id;?>,
            loader: 0,
            question: {},
            error: false,
            errorIndex: 0,
        },
        methods: {
            load() {
                this.loader = 1;
                axios.get('/cources/testing/loadTest/'+ this.id).then((response) => {
                    this.loader = 0;
                    this.questions = response.data.data;
                    if (!this.questions) this.questions = [];
                    this.question = this.questions[0];
                    this.nowIndex = 0;
                });
            },
            checkAnswer(index) {
                this.errorIndex = 0;
                this.error = false;

                if (index != this.question.answer) {
                    this.errorIndex = index;
                    this.error = true;
                    return 0;
                }
                this.nowIndex++;
                if (this.nowIndex >= this.questions.length) {
                    this.question = {};
                } else {
                    this.question = this.questions[this.nowIndex];
                }
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