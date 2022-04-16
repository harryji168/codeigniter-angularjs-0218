import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { Routes, RouterModule } from '@angular/router';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PettypeListComponent } from './components/pettype-list/pettype-list.component';
import { OwnerListComponent } from './components/owner-list/owner-list.component';
import { OwnerCreateComponent } from './components/owner-create/owner-create.component';
import { OwnerDetailsComponent } from './components/owner-details/owner-details.component';

const routes: Routes = [
  { path: '', redirectTo: 'owners', pathMatch: 'full' },

  { path: 'create', component: OwnerCreateComponent },
  { path: 'pettype', component: PettypeListComponent },
  { path: 'owners', component: OwnerListComponent },
  { path: 'owners/:id', component: OwnerDetailsComponent }

];

@NgModule({
  declarations: [
    AppComponent, 
    PettypeListComponent,
    OwnerListComponent,
    OwnerCreateComponent,
    OwnerDetailsComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule,
    RouterModule.forRoot(routes)
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
