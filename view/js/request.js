/* Thanks to le Dimitrosh */

/**
 * @description description
 * @param {type} url the path which the php file lays on
 * @param {type} data data required for the request
 * @param {type} action = get || set || edit || delete
 * @param {type} command
 * @returns {jqXHR} php echo json_encode($stuffYouShouldNotCareBout);
 */
function postRequest(url, data, action, command) {
    return $.post(url, {array: JSON.stringify(data), action: action, command: command});
}
/**
 * @description description
 * @param {type} data
 * @param {type} action
 * @param {type} command
 * @returns {jqXHR}
 */
function getPostRequest(data, action, command) {
    return postRequest('controller/php/ajaxHandler.php', data, action, command);
}