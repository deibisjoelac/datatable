<!-- Componente Use From https://github.com/yajra/dt54/blob/master/resources/assets/js/components/DataTable.vue -->
<template>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th v-for="column in parameters.columns" v-html="title(column)" :key="column.title"></th>
        </tr>
        </thead>
        <tfoot v-show="footer">
            <tr>
                <th v-for="column in parameters.columns" v-html="title(column)" :key="column.title"></th>
            </tr>
        </tfoot>
    </table>
</template>

<script>
    window.$ = window.jQuery = require('jquery');
    require('datatables.net');
    require('datatables.net-bs4');
    export default{
        data() {
            return {
                dataTable: {},
            }
        },
        methods: {
            title(column) {
                return column.title || this.titleCase(column.data);
            },
            titleCase(str) {
                return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
            }
        },
        computed: {
            parameters() {
                const vm = this;
                let callbacks = {
                    createdRow(...args) {
                          vm.$emit('created-row', ...args);
                   },
                   drawCallback(...args) {
                      vm.$emit('draw', ...args);
                   },
                   footerCallback(...args) {
                      vm.$emit('footer', ...args);
                   },
                   formatNumber(...args) {
                      vm.$emit('format', ...args);
                   },
                   headerCallback(...args) {
                      vm.$emit('header', ...args);
                   },
                   infoCallback(...args) {
                      vm.$emit('info', ...args);
                   },
                   initComplete(...args) {
                       vm.$emit('init', ...args);
                   },
                   preDrawCallback(...args) {
                      vm.$emit('pre-draw', ...args);
                   },
                   rowCallback(...args) {
                      vm.$emit('draw-row', ...args);
                   },
                   stateLoadCallback(...args) {
                      vm.$emit('state-load', ...args);
                   },
                   stateLoaded(...args) {
                      vm.$emit('state-loaded', ...args);
                   },
                   stateLoadParams(...args) {
                      vm.$emit('state-load-params', ...args);
                   },
                   stateSaveCallback(...args) {
                      vm.$emit('state-save', ...args);
                   },
                   stateSaveParams(...args) {
                      vm.$emit('state-save-params', ...args);
                   }
               };
                return $.extend(true, {
                        serverSide: true,
                        processing: true
                   },
                   //options props , default 
                   {'lengthMenu' : [[5,10, 25, 50, -1], ["5","10", "25", "50", "Todos"]  ],
                   language: {}},
                   { ajax: this.ajax, columns: this.columns },
                   callbacks
                );
            }
        },
        props: {
            footer: { default: false },
            columns: { type: Array },
            ajax: { default: '' },
            options: { } // optional , in example is default
        },
        mounted() {
            this.dataTable = $(this.$el).DataTable(this.parameters);
            const vm = this;
            $(this.$el).on('click', 'td .btneditar',function(){
                let data = vm.dataTable.row( $(this).closest('tr')).data();
                vm.$emit('editRow', data);
            });
            $(this.$el).on('click', 'td .btneliminar',function(){
                let data = vm.dataTable.row( $(this).closest('tr')).data();
                vm.$emit('deleteRow', data);
            });
                
        }
    }
</script>
