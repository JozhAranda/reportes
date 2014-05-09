$ ->
  
  $('#MR-Modal').on 'click','.btn-save-user',->
    button=$(@)    
    $('#frmUsers').validate
      ignore: []
      rules:
        email:
          required: true
          email:true
        password:
          required: true
        name:
          required: true
        lastname:
          required: true
        permission_id:
          required: true
      submitHandler: ->
        $("#frmUsers").ajaxSubmit
          beforeSend:
            button.prop false
          complete:
            button.prop true
          success: (o)->
            if o.success
              $('#MR-Modal').modal('toggle')
              if o.edit
                $(".btn-edit-user[data-id='" + o.user.id + "']").remove()

              user="<tr class=\"btn-edit-user\" data-id=\"#{o.user.id}\" >";
              user+="<td>#{o.user.email}</td><td>#{o.user.name}</td><td>#{o.user.permission}</td><td>#{o.user.status}</td>";
              user+="<td><i data-id=\"#{o.user.id}\" class=\"fa fa-trash-o fa-2x\"></i> </td></tr>";
              $('.tblusers').prepend user
            else
              window.error(o.messages)
          dataType:'json'
        return false