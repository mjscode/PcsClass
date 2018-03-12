import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { Observable } from 'rxjs/Observable';
import { Blog } from './blog';
import { Post } from './post';

@Injectable()
export class BlogService {
  private apiEndpoint = 'https://jsonplaceholder.typicode.com';

  constructor(private httpClient: HttpClient) { }

  getBlogs(): Observable<Blog[]> {
    return this.httpClient.get<any[]>(`${this.apiEndpoint}/users`)
      .pipe(map(blogs => blogs.map(blogInfo => ({
        name: blogInfo.name,
        website: blogInfo.website,
        company: blogInfo.company.name,
        id: blogInfo.id
      }))));
  }

  getPosts(id: number): Observable<Post[]> {
    return this.httpClient.get<Post[]>(`${this.apiEndpoint}/posts?userId=${id}`);
  }
}
