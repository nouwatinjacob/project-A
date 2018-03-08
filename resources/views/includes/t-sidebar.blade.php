<!-- -->
                            <div class="sidebarblock">
                                <h3>Categories</h3>
                                <div class="divline"></div>
                                <div class="blocktxt">
                                  @foreach($categories as $category)
                                    <ul class="cats">
                                        <li><a href="#">{{ $category->name }}<span class="badge pull-right">{{ $category->topics->count() }}</span></a></li>                                        
                                    </ul>
                                 @endforeach   
                                </div>
                            </div>

                            <!-- -->
                            <div class="sidebarblock">
                                <h3>Poll of the Week</h3>
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    
                                  @foreach($polls as $poll)
                                  <form action="#" method="post" class="form">
                                      {{csrf_field()}}
                                  <p>{{$poll->title}}</p>

                                    @foreach($poll->pollItems as $items)
                                        <table class="poll">
                                            
                                            <tr>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar color2" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 63%">
                                                        {{$items->name}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="chbox">
                                                    <input id="opt2" type="radio" name="opt" value="{{$items->id}}" checked>  
                                                    <label for="opt2"></label>  
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                        <p class="smal">Voting ends on {{ $poll->end_date }}</p>
                                    </form>
                                    @endforeach                                    
                                </div>
                            </div>

                            <!-- -->
                            <div class="sidebarblock">
                                <h3>My Active Threads</h3>
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <a href="#">This Dock Turns Your iPhone Into a Bedside Lamp</a>
                                </div>
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <a href="#">Who Wins in the Battle for Power on the Internet?</a>
                                </div>
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <a href="#">Sony QX10: A Funky, Overpriced Lens Camera for Your Smartphone</a>
                                </div>
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <a href="#">FedEx Simplifies Shipping for Small Businesses</a>
                                </div>
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <a href="#">Loud and Brave: Saudi Women Set to Protest Driving Ban</a>
                                </div>
                            </div>