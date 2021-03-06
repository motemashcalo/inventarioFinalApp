@extends('layouts.master')

@section('htmlheader')

@include('layouts.partials.htmlheader')

        <!-- Select2 -->

<link href="{{ asset('/css/select2.min.css') }}" rel="stylesheet" type="text/css" />



@endsection



@section('contentheader_aqui', 'Equipos')

@section('content')



    <h1>@lang('form.equipos')<a href="{{ url('equipos/create') }}" class="btn btn-primary pull-right btn-sm">@lang('form.addnew') Equipo</a></h1>







    <fieldset>

        <div class="form-group" >

            <div class="input-group">

             <span class="input-group-btn">

                <a  id="sxxxdw3wsfg"  class="zxsdfgsd33" href="{{ url('equipos/{idzx3er}/edit') }}">

                    <button class="zxsdfgsd33 btn btn-default" type="button">@lang('form.buscar')</button>

                </a>

              </span>

                {{Form::select('equipoidf', array(), '',array('id' => 'equipoidf','class' => 'id_serchf form-control')) }}



            </div>

            <label for="equipoid">@lang('form.equipos') </label>





        </div>



    </fieldset>



    <div class="table">

        <table class="table table-bordered table-striped table-hover">

            <thead>

                <tr>

                    <th>@lang('form.sno')</th><th>Modelo</th><th>Custodio</th><th>Estacione</th><th>Actions</th>

                </tr>

            </thead>

            <tbody>

            @php $x=0; @endphp

            @foreach($equipos as $item)

                @php $x++;@endphp

                <tr>

                    <td>{{ $x }}</td>

                    <td><a href="{{ url('equipos', $item->id) }}">{{ $item->modelo_equipoxc->modelo }}</a></td>
                    <td>{{ $item->custodioxc['nombre_responsable'] }}</td>
                    <td>{{ $item->estacionxc->estacion }}</td>

                    <td>

                        <a href="{{ url('equipos/' . $item->id . '/edit') }}">

                            <button type="submit" class="btn btn-primary btn-xs">@lang('form.update')</button>

                        </a> /

                        {!! Form::open([

                            'method'=>'DELETE',

                            'url' => ['equipos', $item->id],

                            'style' => 'display:inline'

                        ]) !!}

                            {!! Form::submit(trans('form.deletee'), ['class' => 'btn btn-danger btn-xs']) !!}

                        {!! Form::close() !!}

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

        <div class="pagination"> {!! $equipos->render() !!} </div>

    </div>



@endsection

@section('scripts')

    @include('layouts.partials.scripts')

    <script src="{{ asset('/js/select2.min.js') }}"></script>

    <script>

        function redirect (url) {

            var ua        = navigator.userAgent.toLowerCase(),

                    isIE      = ua.indexOf('msie') !== -1,

                    version   = parseInt(ua.substr(4, 2), 10);



            // Internet Explorer 8 and lower

            if (isIE && version < 9) {

                var link = document.createElement('a');

                link.href = url;

                document.body.appendChild(link);

                link.click();

            }



            // All other browsers can use the standard window.location.href (they don't lose HTTP_REFERER like IE8 & lower does)

            else {

                window.location.href = url;

            }

        }

        $(function () {



            //alert("hola");

            $('.zxsdfgsd33').click(function (e) {

                e.preventDefault();

                var a = $('#equipoidf').val();

                var b = $('#sxxxdw3wsfg').attr('href');

                var c = b.replace('{idzx3er}', a );

               redirect(c);



            });

            ///////////////////////////////////////////////////////////////////////////////////



            $('.id_serchf').select2({

                // Activamos la opcion "Tags" del plugin



                language: "es",

                placeholder: "Select Avianca Code",

                tags: true,

                tokenSeparators: [','],

                templateResult: formatState,

                ajax: {

                    dataType: 'json',

                    url: '{{ url("tags") }}',

                    delay: 250,

                    data: function(params) {

                        return {

                            term: params.term

                        }

                    },

                    processResults: function (data, page) {

                        return {

                            results: data

                        };

                    },

                }

            });

            ///////////////////////////////////////////////////////////////////////////////////////////

            function formatState (state) {

                if (!state.id) { return state.text; }

                var $state = $(

                        '<span>'+state.id+":" + state.text + '</span>'

                );

                return $state;

            };



            ///////////////////////////////////////////////////////////////////////////////////////



        });





    </script>

@endsection