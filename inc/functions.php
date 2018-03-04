<?php

/* /////////////////////////////////////////////////////
 * Security Functions
 */ /////////////////////////////////////////////////////
 
 // filters the input
function filter($input, $filter = FILTER_SANITIZE_SPECIAL_CHARS)
{
	return filter_var($input, $filter);
}

 // escapes output
function escape($output, $encoding = ENT_QUOTES)
{
	return htmlspecialchars($output, $encoding, 'UTF-8');
}


/* /////////////////////////////////////////////////////
 * URL Functions
 */ /////////////////////////////////////////////////////
function getBasename()
{
	return basename($_SERVER['PHP_SELF']);
}

function getGet($name, $filter = null)
{
	$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
	$result = null;

	if ($filter == null) {
		$result = $request->query->get($name);
	} else {
		$result = $request->query->filter($name, null, $filter);
	}
	confirmResult($result, "Could not retrieve GET variable " . escape($name));
	return $result;

}

function getPost($name, $filter = null)
{
	$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
	$result = null;

	if ($filter == null) {
		$result = $request->request->get($name);
	} else {
		$result = $request->request->filter($name, null, $filter);
	}

	confirmResult($result, "Could not retrieve POST varialbe" . escape($name));
	return;
}


/* /////////////////////////////////////////////////////
 * Database Functions
 */ /////////////////////////////////////////////////////
function getCategories($confirm = false)
{
	global $db;

	try {
		$stmt = $db->query('SELECT * FROM categories ORDER BY name');
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($confirm) {
			confirmResult($result, "Couldn't receive any categories!");
		}

		return $result;

	} catch (Exception $e) {
		displayErrorMessageAndDie($e->getMessage());
	}
}

function getCategoryById($id, $confirm = false)
{
	global $db;

	try {
		$stmt = $db->prepare("SELECT * FROM categories WHERE id=? LIMIT 1");
		$stmt->bindParam(1, $id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($confirm) {
			confirmResult($result, "Could not find a category with an id of '" . escape($id) . "'!");
		}

		return $result;

	} catch (Exception $e) {
		displayErrorMessageAndDie($e->getMessage());
	}
}

function getPagesByCategoryId($id, $confirm = false)
{
	global $db;

	try {
		$stmt = $db->prepare("SELECT * FROM pages WHERE category_id=?");
		$stmt->bindParam(1, $id);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($confirm) {
			confirmResult($result, "Couldn't receive any pages from category with an id of '{$id}'!");
		}

		return $result;
	} catch (Exception $e) {
		displayErrorMessageAndDie($e->getMessage());
	}
}

function getPageById($id, $confirm = false)
{
	global $db;

	try {
		$stmt = $db->prepare("SELECT * FROM pages WHERE id=? LIMIT 1");
		$stmt->bindParam(1, $id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($confirm) {
			confirmResult($result, "Could not find a page with an id of '" . escape($id) . "'!");
		}

		return $result;

	} catch (Exception $e) {
		displayErrorMessageAndDie($e->getMessage());
	}
}

function getPageWithCategoryById($id, $confirm = false)
{
	global $db;

	try {
		$stmt = $db->prepare("SELECT pages.*, categories.id as category_id, categories.name as category_name FROM pages LEFT JOIN categories ON pages.category_id = categories.id WHERE pages.id=? LIMIT 1");
		$stmt->bindParam(1, $id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($confirm) {
			confirmResult($result, "Could not find a page with an id of '" . escape($id) . "'!");
		}

		return $result;
	} catch (Exception $e) {
		displayErrorMessageAndDie($e->getMessage());
	}
}


/* /////////////////////////////////////////////////////
 * Base Functions
 */ /////////////////////////////////////////////////////
function get_excerpt($value, $length = 200)
{
	if (strlen($value) <= $length) {
		return $value;
	}

	return substr($value, 0, strpos($value, " ", $length)) . " ...";
}

function confirmResult($value, $errorMessage = "Could not retrieve data!")
{
	if (empty($value)) {
		displayErrorMessageAndDie($errorMessage);
	}
}

function displayErrorMessageAndDie($message)
{
	displayErrorMessage($message);
	die();
}

function displayErrorMessage($message)
{
	echo "<div class='alert alert-danger'>" . $message . "</div>";
}

// function getCategories()
// {
// 	global $db;

// 	$result = $db->select("SELsECT * FROM categories ORDER BY name");
// 	confirmResult($result);

// 	return $result;
// }

// function getPageById($id)
// {
// 	global $db;

// 	$id = escape($id);

// 	$result = $db->select("SELECT * FROM pages WHERE id='{$id}' LIMIT 1");
// 	confirmResult($result);

// 	return $result;
// }

// function getPageWithCategoryById($id)
// {
// 	global $db;

// 	$id = escape($id);

// 	$result = $db->select("SELECT pages.*, categories.id as category_id, categories.name as category_name FROM pages LEFT JOIN categories ON pages.category_id = categories.id WHERE pages.id='{$id}' LIMIT 1");
// 	confirmResult($result);

// 	return $result;
// }

// function getPagesByCategoryId($id)
// {

// 	global $db;

// 	$id = escape($id);

// 	$result = $db->select("SELECT * FROM pages WHERE category_id='{$id}'");
// 	confirmResult($result);

// 	return $result;
// }

// function convertToCategoryImageName($categoryName)
// {
// 	$categoryName = str_replace('#', 'sharp', $categoryName);
// 	$categoryName = str_replace(' ', '', $categoryName);

// 	return $categoryName;
// }

// function confirmResult($result)
// {
// 	global $db;

// 	if ($result === null) {
// 		// $errorMessage = "<div class='alert alert-danger' role='alert'>" . getLastDatabaseError() . "</div>";
// 		// die($errorMessage);
// 		die("Test 2".getLastDatabaseError());
// 	}
// }

// function getLastDatabaseError()
// {
// 	global $db;

// 	echo $db->getError();
// }

// function escape($value)
// {
// 	global $db;
// 	return $db->escape($value);
// }


?>