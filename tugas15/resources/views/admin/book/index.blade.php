@extends('layouts.layouts')
@section('header', 'Book')
@section('content')
    <div id="controller">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Search from title" v-model="search">
                </div>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary" @click="addData()">Create New Book</button>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12" v-for="book in filteredList">
                <div class="info-box" v-on:click="editData(event, book)">
                    <div class="info-box-content">
                        <span class="info-box-text h3">@{{ book.title }} (@{{book.qty}}) </span>
                        <span class="info-box-number ">Rp. @{{numberRp(book.price)}},- </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="Books" tabindex="-1" role="dialog" aria-labelledby="formAuthor" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form :action="actionUrl" method="post" autocomplete="off" @submit="submitForm($event, book.id)">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Author</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            <div class="form-group">
                                <label >ISBN</label>
                                <input type="numbber" class="form-control" name="isbn" :value="book.isbn" placeholder="Enter ISBN">
                            </div>
                            <div class="form-group">
                                <label >Title</label>
                                <input type="text" class="form-control" name="title" :value="book.title" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label >year</label>
                                <input type="number" class="form-control" name="year" :value="book.year" placeholder="Enter Phone Year">
                            </div>
                            <div class="form-group">
                                <label >Publisher</label>
                                <select id="autoSizingSelect" class="form-control" name="publisher_id" aria-label="Default select example">
                                    @foreach ($publishers as $item)
                                        <option :selected="book.publisher_id=={{$item->id}}" value="{{$item->id}}">{{$item->name}}</option>                                        
                                    @endforeach
                                  </select>
                            </div>
                            <div class="form-group">
                                <label >Author</label>
                                <select id="autoSizingSelect" class="form-control" name="author_id" aria-label="Default select example">
                                    @foreach ($authors as $item)
                                        <option :selected="book.author_id=={{$item->id}}" value="{{$item->id}}">{{$item->name}}</option>                                        
                                    @endforeach
                                  </select>
                            </div>
                            <div class="form-group">
                                <label >Catalog</label>
                                <select id="autoSizingSelect" class="form-control" name="catalog_id" aria-label="Default select example">
                                    @foreach ($catalogs as $item)
                                        <option :selected="book.catalog_id=={{$item->id}}" value="{{$item->id}}">{{$item->name}}</option>                                        
                                    @endforeach
                                  </select>
                            </div>
                            <div class="form-group">
                                <label >QTY Stock</label>
                                <input type="number" class="form-control" name="qty" :value="book.qty" placeholder="Enter Qty">
                            </div>
                            <div class="form-group">
                                <label >Price</label>
                                <input type="number" class="form-control" name="price" :value="book.price" placeholder="Enter price">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" v-if="editStatus" v-on:click="deleteData(book.id, event)">Hapus</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
    var actionUrl = '{{url('books')}}';
    var apiUrl = '{{url('api/books')}}';

    var app = new Vue({
        el: '#controller',
        data:{
            books:[],
            search:'',
            book:{},
            editStatus:false,
            actionUrl,
            apiUrl,

        },
        mounted: function(){
            this.get_books();
        },
        methods:{
            get_books(){
                const _this = this;
                $.ajax({
                    url: apiUrl,
                    method:'GET',
                    success:function(data){
                        _this.books = JSON.parse(data);
                    },
                    error:function(error){
                        console.log(error);
                    }
                });
            },
            numberRp(x){
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            },
            addData(){
                this.book={};
                this.editStatus =false;
                $('#Books').modal();
            },
            editData(event, book){
                this.book = book;
                this.editStatus =true;
                $('#Books').modal();
            },
            deleteData(id, event){
                if (confirm("Are You sure?")) {
                $(event.target).parents('tr').remove();
                axios.post(this.actionUrl+'/'+id, {_method:'DELETE'}).then(response=>{
                    alert('Data has been removed');
                });
            }  
            },
            submitForm(event,id){
                event.preventDefault();
                const _this = this;
                var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                axios.post(actionUrl, new FormData($(event.target)[0])).then(response=>{
                    $('#Books').modal('hide');
                    _this.table.ajax.reload();
                });
            },

        },
        computed:{
            filteredList(){
                return this.books.filter(book=>{
                    return book.title.toLowerCase().includes(this.search.toLowerCase())
                })
            }
        }
    })
</script>
@endsection

