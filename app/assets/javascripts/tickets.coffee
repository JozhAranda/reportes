$ ->

  $('#MR-Modal').on 'click','.btn-save-ticket',->
    button=$(@)
    $('#frmTickets').validate
      ignore: []
      rules:
        title:
          required: true
        category_id:
          required: true
        area_id:
          required: true
        description:
          required: true
      submitHandler: ->
        $("#frmTickets").ajaxSubmit
          beforeSend:
            button.prop false
          complete:
            button.prop true
          success: (o)->
            if o.success
              $('#MR-Modal').modal('toggle')
              if o.edit
                $(".btn-edit-ticket[data-id='" + o.ticket.id + "']").remove()

              ticket="<tr class=\"btn-edit-ticket\" data-id=\"#{o.ticket.id}\" data-url=\"http://morzanreportes.dev/clients/tickets/#{o.ticket.id}/edit\" >";
              ticket+="<td>#{o.ticket.alias}</td><td>#{o.ticket.area}</td><td>#{o.ticket.client}</td><td>#{o.ticket.category}</td>";
              ticket+="<td>#{o.ticket.title}</td><td><label class=\"text-#{o.ticket.status_class}\">#{o.ticket.status}</td>";
              ticket+="<td>#{o.ticket.updated.date}</td><td>#{o.ticket.updated.date}</td><td>#{o.ticket.support}</td>";
              ticket+="<td><i data-id=\"#{o.ticket.id}\" class=\"fa fa-trash-o fa-2x\"></i> </td></tr>";
              $('.tbltickets').prepend ticket
            else
              window.error(o.messages)
          dataType:'json'
        return false