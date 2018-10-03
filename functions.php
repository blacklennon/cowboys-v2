<?php
function get_project()
{
    $project = scandir(__DIR__ . "/__PROJECTS");
    array_splice($project, 0, 2);
    return $project;
}

function get_files($project)
{
    $files = scandir(__DIR__ . "/__PROJECTS/" . $project);
    array_splice($files, 0, 2);
    return $files;
}

function get_newsletter_text()
{
    return file_get_contents(__DIR__ . "/__NEWSLETTER.html");
}

function get_text($project)
{
    return file_get_contents(__DIR__ . "/__PROJECTS/" . $project . "/text.txt");
}

function set_text($project, $code, $nb)
{
    file_put_contents(__DIR__ . "/__PROJECTS/" . $project . "/".$nb.".txt", $code);
}

function set_title($project, $title)
{
    file_put_contents(__DIR__ . "/__PROJECTS/" . $project . "/title.txxt", $title);
}

function get_index()
{
    return file_get_contents(__DIR__ . "/__INDEX.txt");
}

function set_index($text)
{
    file_put_contents(__DIR__ . "/__INDEX.txt", $text);
}

function get_files_path($project)
{
    $splice = [];
    $files = get_files($project);
    foreach ($files as $key => $value) {
        if (preg_match("/thumbnail/", $value)) {
            array_push($splice, $key);
        }

        $files[$key] = "/__PROJECTS/" . $project . "/" . $files[$key];
    }
    foreach ($splice as $key => $value) {
        array_splice($files, $value - $key, 1);
    }
    return $files;
}

function create_folders($name)
{
    mkdir(__DIR__ . "/__PROJECTS/" . $name);
}

function upload_media($project, $files, $nb_video)
{
    foreach ($files["media"]["error"] as $key => $error) {
        if ($key <= 9 && $key >= 0) {
            $index = '0' . $key;
        }
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $files["media"]["tmp_name"][$key];
            if ($index == $nb_video)
                $name = $index . '-thumbnail.' . end(explode('/', $files["media"]["type"][$key]));
            else 
                $name = $index . '.' . end(explode('/', $files["media"]["type"][$key]));
            move_uploaded_file($tmp_name, __DIR__ . "/__PROJECTS/" . $project . '/' . $name);
        }
    }
}

function removeDirectory($path)
{
    $files = glob($path . '/*');
    foreach ($files as $file) {
        is_dir($file) ? removeDirectory($file) : unlink($file);
    }
    rmdir($path);
    return;
}

function delete_project($project)
{
    removeDirectory(__DIR__ . "/__PROJECTS/" . $project);
}

function create_project($post, $files)
{
    create_folders($post['project']);
    set_text($post['project'], $post['video'], $post['video-nb']);
    set_title($post['project'], $post['project-title']);
    upload_media($post['project'], $files, $post['video-nb']);
}

function create_manifest($post)
{
    file_put_contents(__DIR__ . "/__MANIFEST.txt", $post['manifest']);
}

function create_contact($post)
{
    file_put_contents(__DIR__ . "/__CONTACT.txt", $post['contact']);
}