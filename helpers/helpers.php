<?php 

     function decodeBase64File($base64_file)
    {
        // Get the MIME type of the file
        $mime_type = explode(';', $base64_file)[0];
        $file_type = explode(':', $mime_type)[1];

        $name = explode('|', $mime_type)[0];
        $name = explode('.', $name)[0];

        // Get the file extension based on the MIME type
        $extensions = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'application/pdf' => 'pdf',
            'application/msword' => 'doc',
            'application/docx' => 'docx',
            'application/wps-office.docx' => 'docx',
            'application/vnd.ms-excel' => 'xls',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
            'application/vnd.ms-powerpoint' => 'ppt',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
            'text/plain' => 'txt',
            'application/zip' => 'zip',
            '*.docx' => 'docx'
            // Add more MIME types and their corresponding extensions as needed
        ];

        $extension = $extensions[$file_type] ?? 'txt'; // Default extension

        // Remove the 'data:image/png;base64,' part from the file data
        // $file_data = preg_replace('/^data:.*;base64,/', '', $base64_file);
        $file_data = preg_replace('/^.*\|data:.*;base64,/', '', $base64_file);

        // Decode the base64 file data to raw binary data
        $file_binary = base64_decode($file_data);

        // Generate a filename for the file
        $filename = $name . '.' . $extension;

        return [$filename, $file_binary];
    }