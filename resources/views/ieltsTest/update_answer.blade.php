  @extends("layouts.app")
  @section("content")
  <form method="post" action="{{route('update.test.answer')}}">
    @csrf
      @if(count($answer)>0)
              <button type='submit' onclick='displayAnswer1()' style='width: 100px; height: 40px; border-radius: 3px; background-color: lightblue; font-weight: 700;'>Submit</button>
              @foreach($answer as $key=>$val)
                <div style='transform: scale(0.65); position: relative; border: 2px solid #4f5962;'>
                  <h1>Quest {{ $key }}.</h1>
                  <p>Choose {{ $key }} answer</p>
                  <hr/>
                  <div class="row">
                      <div id='block-11' style='padding: 10px;' class="col-sm">
                        <label for='option-11' style=' padding: 5px; font-size: 2.0rem;'>1.   
                          <input type='radio' name='answer[{{$key}}]' value='A'   style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' {{ ($val=="A")? "checked" : "" }}  required />
                        </label>
                      </div>
                      <div id='block-12' style='padding: 10px;' class="col-sm">
                        <label for='option-12' style=' padding: 5px; font-size: 2.0rem;'>2. 
                          <input type='radio' name='answer[{{$key}}]' value='B'   style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' {{ ($val=="B")? "checked" : "" }} />
                        </label>
                      </div>
                      <div id='block-13' style='padding: 10px;' class="col-sm">
                        <label for='option-13' style=' padding: 5px; font-size: 2.0rem;'>3. 
                          <input type='radio' name='answer[{{$key}}]' value='C'   style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;'  {{ ($val=="C")? "checked" : "" }} />
                        </label>
                      </div>
                      <div id='block-14' style='padding: 10px;' class="col-sm">
                        <label for='option-14' style=' padding: 5px; font-size: 2.0rem;'>4. 
                          <input type='radio' name='answer[{{$key}}]' value='D'  style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' {{ ($val=="D")? "checked" : "" }} />
                        </label>
                      </div>
                  </div>
                </div>
              @endforeach  
          @else
              @for($i=1;$i<=40;$i++)
                <div style='transform: scale(0.65); position: relative; border: 2px solid #4f5962;'>
                  <h1>Quest {{ $i }}.</h1>
                  <p>Choose {{ $i }} answer</p>
                  <hr/>
                  <div class="row">
                      <div id='block-11' style='padding: 10px;' class="col-sm">
                        <label for='option-11' style=' padding: 5px; font-size: 2.0rem;'>1.  
                          <input type='radio' name='answer[{{$i}}]' value='A'   style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' required />
                        </label>
                      </div>
                      <div id='block-12' style='padding: 10px;' class="col-sm">
                        <label for='option-12' style=' padding: 5px; font-size: 2.0rem;'>2. 
                          <input type='radio' name='answer[{{$i}}]' value='B'   style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' />
                           </label>
                      </div>
                      <div id='block-13' style='padding: 10px;' class="col-sm">
                        <label for='option-13' style=' padding: 5px; font-size: 2.0rem;'>3. 
                          <input type='radio' name='answer[{{$i}}]' value='C'   style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;'/>
                        </label>
                      </div>
                      <div id='block-14' style='padding: 10px;' class="col-sm">
                        <label for='option-14' style=' padding: 5px; font-size: 2.0rem;'>4. 
                          <input type='radio' name='answer[{{$i}}]' value='D'  style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' />
                          </label>
                      </div>
                  </div>
                </div>
              @endfor
          @endif
          <div class="row" style='transform: scale(0.65); position: relative;'>
            <input type="hidden" name="test_id" value="{{ $id }}">  
          <button type='submit' onclick='displayAnswer1()' style='width: 100px; height: 40px; border-radius: 3px; background-color: lightblue; font-weight: 700;'>Submit</button>
          </div>
  </form>
  @endsection
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
