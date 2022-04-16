import { Component, OnInit } from '@angular/core';
import { OwnerService } from 'src/app/services/owner.service';

@Component({
  selector: 'app-owner-list',
  templateUrl: './owner-list.component.html',
  styleUrls: ['./owner-list.component.css']
})  
 
export class OwnerListComponent implements OnInit {

  owners: any;
  currentOwner = null;
  currentIndex = -1;
  name = '';
  ownerItem : any;

  constructor(private ownerService: OwnerService) { }

  ngOnInit(): void {
    this.getOwner(); 
  }

  getOwner(): void {
    this.ownerService.readAll()
      .subscribe(
        items => {
          this.owners = items.owners;
           console.log(items);         
        },
        error => {
          console.log(error);
        }
      );
  }

  setCurrentOwner(item, index): void {
    //console.log(item.id);
    this.ownerService.read(item.id)  
      .subscribe(
        selectedOwner => {
         // console.log(selectedOwner);
          this.ownerItem = selectedOwner.id;
          this.currentOwner = selectedOwner;
        //  console.log(this.currentOwner);
        },
        error => {
          console.log(error);
        }
      );
    this.currentIndex = index;
  }

}
