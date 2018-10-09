#include "popupaddboarder.h"
#include "ui_popupaddboarder.h"
#include "rents.h"

PopUpAddBoarder::PopUpAddBoarder(QWidget *parent) :
    QWidget(parent),
    ui(new Ui::PopUpAddBoarder)
{
    ui->setupUi(this);
    QPixmap pix("C:/Users/GianFrancesSacay/Desktop/RoomRental/RoomRental/images/ddd");
    ui->label_2->setPixmap(pix);
}

PopUpAddBoarder::~PopUpAddBoarder()
{
    delete ui;
}

void PopUpAddBoarder::on_pushButton_clicked()
{
    Rents *r=new Rents;
    this->hide();
    r->show();
}
