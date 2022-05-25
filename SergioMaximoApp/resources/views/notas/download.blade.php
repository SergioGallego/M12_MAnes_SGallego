<div>
    <h1 style="text-align: center">{{$alumno->nombre}} {{$alumno->apellidos}} - {{$alumno->ciclo}}</h1>
    <ul>
        @php 
            
            $info = $alumno->nombre;
            
        @endphp
    <hr>
        @foreach ($arrayModulos as $key => $m)
            @php
                $horas = 0;
                $notaMedia = 0;
            @endphp
            @if ($alumno->ciclo == $m->ciclos->nombre)
                <li>{{$m->nombre}} - {{$m->comentario}}</li>
                    @foreach ($arrayUFs as $key => $u)
                        @if ($u->modulo_id == $m->id)
                            @foreach ($alumno->ufs as $uf)
                                @if($uf->id == $u->id)
                                    @php 
                                        $notaMedia += $uf->pivot->nota*$u->horas;
                                    @endphp
                                    <div>
                                        <span>{{$u->nombre}} - Nota: {{$uf->pivot->nota}}</span><br>
                                    </div>
                                @endif
                            @endforeach
                            @php 
                                $horas += $u->horas;
                            @endphp
                        @endif
                    @endforeach
                <br>
                  
                <b>Final:</b> {{@number_format($notaMedia / $horas)}}<br>

                <hr>

                <br>
            @endif
        @endforeach
    </ul>
</div>