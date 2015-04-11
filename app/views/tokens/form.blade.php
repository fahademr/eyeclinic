
                <table width="621" height="500" border="0">

              <tr>
                  <td width="272" height="55"><label>Token Number: </label> </td>
                  <td width="333">
                      {{ Form::input('number', 'tok_num', isset($num)? $num : null , array('readonly' => 'true', 'id' => 'tok_num', 'style' => "width: 98%; height: 35px")) }}
                  </td>
              </tr>
              <tr>
                <td width="272" height="55"><label>Select Doctor*</label> </td>
                <td width="333">
                    {{ Form::select('doctor_id', $doctors->lists('name', 'id'), null, ['required' => 'true', 'id' => 'employee_id', 'style' => "width: 100%; height: 38px"] ); }}
                </td>
                </tr>
                <tr>
                   <td width="272" height="55"><label>Select Patient*</label> </td>
                   <td width="333">
                      {{ Form::select('patient_id', $patients->lists('name', 'id'), null, ['required' => 'true', 'id' => 'patient_id', 'style' => "width: 100%; height: 38px"] ); }}
                   </td>
                </tr>
                <tr>
                    <td width="272" height="55"><label>Checkup Fee*</label> </td>
                    <td width="333">
                        {{ Form::input('number', 'fee', null, array('required' => 'true', 'style' => "width: 98%; height: 35px")) }}
                    </td>
                </tr>
                <tr>
                   <td width="272" height="55"><label>Checkup Note:</label> </td>
                   <td width="333" height="200">{{ Form::textarea('note', null, array('rows' => '7', 'cols' => '20', 'placeholder' => 'Enter Note', "style" => "font-size: 1.2em; margin-top: 2px; resize: none; width: 98%") ) }}</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center>
                        <div class="btn-wrap">
                            <a class="btn_3" href="javascript:document.getElementById('regForm').reset();" data-type="reset">Reset</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="submit" value="Save" class="submit" />
                        </div>
                    </center>
                    </td>
                </tr>
            </table>
