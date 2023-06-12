<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Subir los documentos para la beca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        #container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-top: 0;
        }

        #dropzone {
            width: 100%;
            height: 200px;
            border: 2px dashed #ccc;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            cursor: pointer;
        }

        #file-input {
            display: none;
        }

        #message {
            font-size: 16px;
            color: #555;
            text-align: center;
            margin: 10px;
        }

        #uploaded-files {
            font-size: 14px;
            padding-left: 20px;
        }

        .file-item {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div id="container">
        <h1>Subir los documentos para la beca</h1>
        <div id="dropzone">
            <input type="file" id="file-input" multiple>
            <div id="message">Arrastra y suelta tus archivos aquí<br>o haz clic para seleccionarlos.</div>
        </div>
        <div id="uploaded-files"></div>
    </div>

    <script>
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('file-input');
        const message = document.getElementById('message');
        const uploadedFiles = document.getElementById('uploaded-files');

        dropzone.addEventListener('click', () => {
            fileInput.click();
        });

        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.classList.add('dragover');
        });

        dropzone.addEventListener('dragleave', () => {
            dropzone.classList.remove('dragover');
        });

        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('dragover');
            const files = e.dataTransfer.files;
            handleFiles(files);
        });

        fileInput.addEventListener('change', () => {
            const files = fileInput.files;
            handleFiles(files);
        });

        function handleFiles(files) {
            uploadedFiles.innerHTML = '';
            if (files.length > 0) {
                message.style.display = 'none';
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const listItem = document.createElement('div');
                    listItem.classList.add('file-item');
                    listItem.textContent = file.name;
                    uploadedFiles.appendChild(listItem);
                }
            } else {
                message.style.display = 'block';
            }
        }
    </script>
</body>

</html>