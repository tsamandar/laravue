import request from '@/utils/request';

export function fetchList(query) {
  return request({
    url: '/reservations',
    method: 'get',
    params: query,
  });
}

export function fetchReservations(id) {
  return request({
    url: '/reservations/' + id,
    method: 'get',
  });
}

export function fetchRooms(id) {
  return request({
    url: '/rooms/' + id,
    method: 'get',
  });
}

export function fetchPv(id) {
  return request({
    url: '/articles/' + id + '/pageviews',
    method: 'get',
  });
}

export function createArticle(data) {
  return request({
    url: '/article/create',
    method: 'post',
    data,
  });
}

export function updateArticle(data) {
  return request({
    url: '/article/update',
    method: 'post',
    data,
  });
}
