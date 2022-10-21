<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Toast UI Image Editor</title>
        <link
        type="text/css"
        href="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.css"
        rel="stylesheet"
      />
      <link type="text/css" href="{{asset('tui/dist/tui-image-editor.css')}}" rel="stylesheet" />
      <style>
        @import url(http://fonts.googleapis.com/css?family=Noto+Sans);
        html,
        body {
          height: 100%;
          margin: 0;
        }
      </style>
    </head>
    <body>
        {{-- <div id="tui-image-editor-container"></div> --}}
        <iframe style="width:100%; height:1000px;" id="miniPaint" src="https://viliusle.github.io/miniPaint/" allow="camera"></iframe>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.4.0/fabric.js"
    ></script>
    <script
      type="text/javascript"
      src="https://uicdn.toast.com/tui.code-snippet/v1.5.0/tui-code-snippet.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"
    ></script>
    <script type="text/javascript" src="{{asset('tui/dist/tui-image-editor.js')}}"></script>
    <script type="text/javascript" src="{{asset('tui/js/theme/white-theme.js')}}"></script>
    <script type="text/javascript" src="{{asset('tui/js/theme/black-theme.js')}}"></script>
    <script>
      // Image editor
      var imageEditor = new tui.ImageEditor('#tui-image-editor-container', {
        includeUI: {
        //   loadImage: {
        //     path: '{{asset("tui/img/sampleImage2.png")}',
        //     name: 'SampleImage',
        //   },
          theme: blackTheme, // or whiteTheme
          initMenu: 'filter',
          menuBarPosition: 'bottom',
        },
        cssMaxWidth: 500,
        cssMaxHeight: 300,
        usageStatistics: false,
      });
      imageEditor.ui.resizeEditor({
    imageSize: {oldWidth: 100, oldHeight: 100, newWidth: 700, newHeight: 700},
    uiSize: {width: 1000, height: 1000}
});
// Apply the ui state while preserving the previous attribute (for example, if responsive Ui)
imageEditor.ui.resizeEditor();
    </script>
    </body>
</html>
