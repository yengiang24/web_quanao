                                    	@foreach($san_pham as $spham)
                                        <tr>
                                            <td>{{$spham->ma_so_sp}}</td>
                                            <td><a href="{{route('chi-tiet-san-pham', $spham->ma_so_sp)}}">{{$spham->ten_sp}}</a></td>
                                            <td></td>
                                            <td>{{number_format($spham->gia_ban)}} VND</td>
                                            <td>{{number_format($spham->gia_nhap)}} VND</td>
                                            <td>{{$spham->created_at}}</td>
                                            <td>{{$spham->updated_at}}</td>
                                            <td></td>
                                        </tr>
                                        @endforeach