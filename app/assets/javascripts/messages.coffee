$ ->

  $('#MR-Modal').on 'click','.btn-save-msg',->
    button=$(@)
    $('#frmMessages').validate
      ignore: []
      rules:
        text:
          required: true
      submitHandler: ->
        $("#frmMessages").ajaxSubmit
          beforeSend:
            button.prop false
          complete:
            button.prop true
          success: (o)->
            if o.success
              $('#MR-Modal').modal('toggle')
              if o.edit
                $(".btn-edit-ticket[data-id='" + o.ticket.id + "']").remove()

              if $('.panel:last').hasClass('panel-primary')
                panel='info'
              else
                panel='primary'

              message='<div class="panel panel-'+panel+'">';
              message+="<div class=\"panel-heading\">#{o.message.name}</div>";
              message+="<div class=\"panel-body\">#{o.message.text}</div>";
              message+="<div class=\"panel-footer\">#{o.message.created}</div>";
              message+="</div>";
              
              $('.messages').append message
            else
              window.error(o.messages)
          dataType:'json'
        return false