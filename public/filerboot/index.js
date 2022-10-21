// to download the file use filesaver, link is:
// https://www.npmjs.com/package/file-saver
// let fileHandleUrl = "{{ url('/handleImageFile') }}";
let fileHandleUrl = "handleImageFile";
let imagePath = "{{asset('images')}}";
// var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').content;

// const config = {
//   cloudimage: {
//     token: 'dabkfabvu'
//   }
// };
const config = {
  source: "https://scaleflex.cloudimg.io/v7/demo/river.png"
};
const onComplete = (url, file) => {
  console.log("the file url is: ", url);
  console.log("the main file: ", file);
}
const onBeforeComplete = (props) => {
  // let imageBase64 = props.canvas.toDataURL()
  let imageBase64 = props.canvas.imageBase64;
  console.log("props is: ", props);
  // console.log("props is: ", props.canvas.toDataURL());
  console.log(base64ToBlob(imageBase64));

  const formdata = new FormData
  formdata.append('_token', CSRF_TOKEN);
  formdata.append('imageFile', base64ToBlob(imageBase64));
  formdata.append('imageName', '/images/' + props.imageName)
  // formdata.append('imageName', imagePath + '/' + props.imageName)

  // fetch('./fileEditHandler.php', {
  fetch(fileHandleUrl, {
    body: formdata,
    method: 'POST',
  }).then(res => res.json()).then(data => console.log(data))
}

let imagesToEdit = document.getElementsByClassName('image-to-edit')
const container = document.getElementById("image-editor");
for (let i = 0; i < imagesToEdit.length; i++) {
  const element = imagesToEdit[i];
  element.onclick = function () {
    let image = this.getElementsByTagName('img')[0]
    const ImageEditor = new FilerobotImageEditor(container,{
      source: image.src
    });
    ImageEditor.render({
      // additional config provided while rendering
      observePluginContainerSize: true,
      onSave: (imageInfo, designState) => {
        const formdata = new FormData
        formdata.append('_token', CSRF_TOKEN);
        formdata.append('imageFile', base64ToBlob(imageInfo.imageBase64));
        formdata.append('imageName', '/images/' + imageInfo.fullName)
        // formdata.append('imageName', imagePath + '/' + props.imageName)
      
        // fetch('./fileEditHandler.php', {
        fetch(fileHandleUrl, {
          body: formdata,
          method: 'POST',
        }).then(res => res.json()).then(data => console.log(data))
      },
      onClose: (closingReason) => {
        console.log('Closing reason', closingReason);
        filerobotImageEdtior.terminate();
      }
    });


    // const ImageEditor = new FilerobotImageEditor(config, {
    //   onComplete: onComplete,
    //   onBeforeComplete: onBeforeComplete,
    //   onClose: () => {
    //     ImageEditor.unmount()
    //   }
    // });
    // ImageEditor.open(image.src);
    
  }
  
}

const base64ToBlob = (base64) => {
  const bytes = atob(base64.split(',')[1]);
  const mime_type = base64.split(',')[0].split(';')[0].split(':')[1]
  const aB = new ArrayBuffer(bytes.length)
  const u8B = new Uint8Array(aB)
  for (let i = 0; i < bytes.length; i++) {
    u8B[i] = bytes.charCodeAt(i)
  }
  return new Blob([aB], {type: mime_type})
}