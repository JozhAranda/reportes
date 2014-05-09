$ ->
    
  $('#MR-Modal').on 'click','.btn-save-area',->
    button=$(@)    
    $('#frmAreas').validate
      ignore: []
      rules:
        title:
          required: true          
        alias:
          required: true
          maxlength:2        
      submitHandler: ->
        $("#frmAreas").ajaxSubmit
          beforeSend:
            button.prop false
          complete:
            button.prop true
          success: (o)->
            if o.success
              $('#MR-Modal').modal('toggle')
              if o.edit
                $(".btn-edit-area[data-id='" + o.area.id + "']").remove()

              area="<tr class=\"btn-edit-area\" data-id=\"#{o.area.id}\" >";
              area+="<td>#{o.area.alias}</td><td>#{o.area.title}</td>";
              area+="<td><i data-id=\"#{o.area.id}\" class=\"fa fa-trash-o fa-2x\"></i> </td></tr>";
              $('.tblareas').prepend area
            else
              window.error(o.messages)
          dataType:'json'
        return false