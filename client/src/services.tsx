// @var endPoint as String, queryData as Object
const url = '';
const requestProperties = {};

export async function getData(endPoint = '', queryData = '') {
	const query =
		Object.entries(queryData)
			.reduce((acc, item) => {
				const prefix = !acc ? '?' : '&';

				return acc += prefix + item[0] + '=' + item[1];
			}, '');

	const response = await fetch(url + '/' + endPoint + query, {
		...requestProperties,
		method: 'GET'
	});

	return response;
};

/*
* @var data as Object
*/
export async function postData(endPoint = '', data = {}) {
	const response = await fetch(url + '/' + endPoint, {
		...requestProperties,
		method: 'POST',
		body: JSON.stringify(data)
	});

	return response;
};