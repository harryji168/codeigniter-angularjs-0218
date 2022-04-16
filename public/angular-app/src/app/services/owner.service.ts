import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

const baseURL = '../../../api';

@Injectable({
  providedIn: 'root'
})
export class OwnerService {

  constructor(private httpClient: HttpClient) { }

  readAll(): Observable<any> {
    return this.httpClient.get(baseURL);
  }

  read(id): Observable<any> {
    return this.httpClient.get(`${baseURL}?id=${id}`);
  }

  create(data): Observable<any> {
    console.log("=="+data['name']);
    console.log("=="+data['pets']);
    data['id']=0;
    return this.httpClient.post(baseURL, data);
  }

  update(id, data): Observable<any> {
    console.log("=="+data['id']);
    return this.httpClient.put(`${baseURL}`, data); //?id=${id}
  }

  delete(id): Observable<any> {
    return this.httpClient.delete(`${baseURL}?id=${id}`);
  }
}
