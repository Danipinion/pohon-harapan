<?php

namespace App\Filament\Resources\Donations\Tables;

use App\Models\Donation;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DonationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project.title')->searchable(),
                TextColumn::make('user.name')->default('Guest'),
                TextColumn::make('amount')->money('IDR')->sortable(),
                ImageColumn::make('payment_proof')
                    ->label('Bukti Transfer')
                    ->disk('public')
                    ->action(
                        Action::make('zoom')
                            ->label('Perbesar Gambar')
                            ->modalContent(fn(Donation $record): View => view(
                                'filament.modals.image-viewer',
                                ['url' => $record->payment_proof ? asset('storage/' . $record->payment_proof) : null]
                            ))
                            ->modalHeading('Bukti Pembayaran')
                            ->modalSubmitAction(false)
                            ->modalCancelActionLabel('Tutup')
                            ->visible(fn(Donation $record): bool => (bool)$record->payment_proof)
                    ),
                TextColumn::make('status')->badge()->color(fn(string $state): string => match ($state) {
                    'pending' => 'warning',
                    'paid' => 'success',
                    'failed' => 'danger',
                }),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                // Tambahkan filter di sini
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        // tambahkan status lain jika ada
                    ])
                    ->label('Status Pembayaran'),

                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')->label('Dari Tanggal'),
                        DatePicker::make('created_until')->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Action::make('confirm')
                    ->label('Konfirmasi')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->action(fn(Donation $record) => $record->update(['status' => 'paid']))
                    ->requiresConfirmation()
                    ->visible(fn(Donation $record): bool => $record->status === 'pending'),

                Action::make('reject')
                    ->label('Tolak')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->action(fn(Donation $record) => $record->update(['status' => 'failed']))
                    ->requiresConfirmation()
                    ->visible(fn(Donation $record): bool => $record->status === 'pending'),
            ])
            ->defaultPaginationPageOption(5);
    }
}
