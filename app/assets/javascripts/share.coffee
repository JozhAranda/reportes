 $ ->
  initial=true

  #Show loading bar
  $(document).ajaxStart ->
    NProgress.start()

  $(document).ajaxStop ->
    NProgress.done()

  #cargamos el contenido por medio de ajax y cambiamos el url
  loadContent= (url) ->
    initial=false
    $('#workspace').load url + ' #workspace > *', (data)->
      title = $(data).filter('title').text()
      document.title = title;
      history.pushState({myTag: true}, 'New URL: '+url, url)

  #al darle back
  window.onpopstate = (event)->
    if not initial
      loadContent(location.pathname)

  #al hacer click a un link
  $(document).on 'click touchstart',".navbar-nav li a", (e)->
    e.stopImmediatePropagation();
    $('.navbar-nav li').removeClass 'active'
    if not $(@).hasClass 'events'
      loadContent($(@).attr('href'))

    return false

#Inicializamos un dialog
  $('#MR-Modal').modal
    show:false
    backdrop:false

  window.dialog= (url)->    
    $('#MR-Modal .modal-content').load url, ->
      $('#MR-Modal').modal 'show'

  $('.content').on 'click','[class*=" btn-new-"],[class^="btn-edit-"]',->
    window.dialog($(@).data('url'))


  $('.content').on 'click','.delete',(e)->
    self=$(@)
    e.stopPropagation()
    $('.frmDelete').ajaxSubmit
      data:
        'txtid':self.data('id')
      success: (o)->
        if o.success
          self.parents('tr').remove()
        else
          window.error('error')
      dataType:'json'
    return false

  window.error=(message)->
    error=$('<div class="alert alert-danger" />')
    error.html message
    if $('#MR-Modal').is(":visible")
      $('#MR-Modal .modal-header').append error
    else
      $('.header').append error
    setTimeout ->
      error.toggle 'slow'
    ,5000






